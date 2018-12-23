<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

  private $request;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function jwt(User $user)
    {
      $payload = [
        'iss' => "lumen_auth_jwt", // pembuat token
        'sub' => $user->id, // pemilik token
        'iat' => time(), // waktu dibuat token
        'exp' => time() + 60*60 // masa berlaku token
      ];

      return JWT::encode($payload, env('JWT_SECRET'));
    }

    public function authenticate(User $user)
    {
      $this->validate($this->request,[
        'email'     => 'required|email',
        'password'  => 'required'
      ]);

      // temukan user berdasarkan email
      $user = User::where('email', $this->request->input('email'))->first();

      if(!$user)
      {
        return response()->json(['error' => 'Email tidak ada !'], 400);
      }

      //verifikasi password dan Token
      if (Hash::check($this->request->input('password'), $user->password)) {
        return response()->json([
          'token' => $this->jwt($user)
        ]);
      }

      return response()->json(['error' => 'Email / password salah'], 400);
    }
}
