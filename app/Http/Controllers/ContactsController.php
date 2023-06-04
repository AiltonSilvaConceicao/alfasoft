<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class ContactsController extends Controller
{
    /**
     * Method for listing contacts
     *
     * @return void
     */
    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $dados = Contacts::all();

        return view('list', compact('dados'));
    }

    /**
     * Method for listing contacts
     *
     * @return void
     */
    public function index()
    {
        $dados = Contacts::all();
        return view('list', compact('dados'));
    }

    public function create()
    {
        return view('create');
    }

    public function confirm($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        return view('confirm', compact('id'));
    }

    /**
     * Inser register.
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $contact = new Contacts();

        $has_contact = $contact->where('email', $input['email'])->first();

        if(!empty($has_contact)){
            $error = 'Usuário já cadastrado no Sistema!';
            return view('unsuccess', compact('error'));
        }

        $strlen_name = strlen($input['name']);
        $strlen_contact = strlen($input['contact']);

        if ($strlen_name < 5) {
            $error = 'O nome do Usuário é menor que 5 caracteres! Tente novamente!';
            return view('create')->with('error', $error);
        }

        if ($strlen_contact < 9) {
            $error = 'O contato do Usuário é menor que 9 caracteres! Tente novamente!';
            return view('create')->with('error', $error);
        }

        $validMail = $this->valida_email($input['email']);

        if (!$validMail) {
            $error = 'Esse email digitado: ' . $input['email'] . ' não é válido !';
            return view('create')->with('error', $error);
        }

        $save = $contact->insertData($input);

        if(!empty($save)) {
            return redirect()->action([self::class, 'index']);
        } else {
            $error = 'Usuário Não foi cadastrado! Tente novamente';
            return view('unsuccess', compact('error'));
        }
    }

    public function edit($contactId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $contact = new Contacts();
        $dados = $contact->find($contactId);

        return view('edit', compact('dados', 'contactId'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $strlen_name = strlen($input['name']);
        $strlen_contact = strlen($input['contact']);

        if ($strlen_name < 5) {
            $error = 'O nome do Usuário é menor que 5 caracteres! Tente novamente!';
            return view('create')->with('error', $error);
        }

        if ($strlen_contact < 9) {
            $error = 'O contato do Usuário é menor que 9 caracteres! Tente novamente!';
            return view('create')->with('error', $error);
        }

        $validMail = $this->valida_email($input['email']);

        if (!$validMail) {
            $error = 'Esse email digitado: ' . $input['email'] . ' não é válido !';
            return redirect()->route('contacts.edit', ['id' => $id])->withErrors(['error' => $error]);
        }
        $contact = new Contacts();


        $save = $contact->updateData($input, $id);

        if(!empty($save)) {
            return redirect()->action([self::class, 'index']);
        } else {
            $error = 'Usuário Não foi atualizado! Tente novamente';
            return view('unsuccess', compact('error'));
        }
    }

    public function details($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $contact = new Contacts();
        $dados = $contact->find($id);

        return view('details', compact('dados', 'id'));
    }

    public function delete($id)
    {
        $contact = new Contacts();

        $save = $contact->deleteData($id);

        if(!empty($save)) {
            return redirect()->action([self::class, 'index']);
        } else {
            $error = 'Usuário Não foi atualizado! Tente novamente';
            return view('unsuccess', compact('error'));
        }
    }

    /**
     * Validação de e-mail
     *
     * @param [type] $email
     * @return void
     */
    public function valida_email($email)
    {
        $email = str_replace(' ', '', $email);
        $email = trim($email);
        /* Verifica se o email e valido */
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            /* Obtem o dominio do email */
            list($usuario, $dominio) = explode('@', $email);

            /* Faz um verificacao de DNS no dominio */
            if (checkdnsrr($dominio, 'MX') == 1){
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
