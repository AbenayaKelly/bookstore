<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function formRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
        'name'=> 'required|string',
        'email' => 'required|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/|unique:users,email',
        'password'=> 'required|string|min:6|confirmed',
        'tipo' => 'required|in:admin,client'
        ],[
        
        'name.required'=>'O campo nome é obrigatório',
        'email.required'=> 'O campo e-mail é obrigatório',
        'email.regex'=> "O campo e-mail deve ser um endereço válido",
        'email.unique' => 'Este e-mail ja está cadastrado',
        'password.required'=>'O campo senha  é obrigatório',
        'password.min'=>'A senha deve ter no mínimo 6 caracteres',
        'password.confirmed' => 'A confrimação da senha não corresponde a senha ',
        
    ]);
          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
         ]);  
         return redirect()->route('login')->with('success', 'Cadastro realizado com secesso ');
        }
        public function formLogin()
        {
            return view('auth.login'); // Certifique-se de que a view exista
        }
    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required',
        ]);

               // Verifique se o e-mail existe no banco de dados
            $user = User::where('email', $request->email)->first();
            if(!$user){
                return back()->withErrors(['email' => 'E-mail não cadastrado']);

            }
             // Verifique se a senha está correta
            if(!hash::check($request->password, $user->password)){
                  // Caso a senha esteja incorreta
                return back()->withErrors(['password' => 'Senha incorreta.']);
            }
             // Tente autenticar o usuário
            if(Auth::attempt(['email'=>$request->email, 'password' =>$request->password])){
                return redirect()->route('books.index');
            }
            return back()->withErrors(['email' => ' Credenciais Inválidas']);
        }

        public function logout(Request $request){
            Auth::logout();// Desloga o usuário atual
            $request->session()->invalidate();  // Invalida a sessão atual e gera um novo token CSRF
            $request->session()->regenerateToken();
            return redirect()->route('home')->with('success', 'Você saiu com sucesso');
        }
    
}
