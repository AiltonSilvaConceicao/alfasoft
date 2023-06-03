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
            $error = 'O nome do Usuário é menor que 5! Tente novamente!';
            return view('create')->with('error', $error);
        }

        if ($strlen_contact < 9) {
            $error = 'O contato do Usuário é menor que 9! Tente novamente!';
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
        $contact = new Contacts();


        $save = $contact->updateData($input, $id);

        if(!empty($save)) {
            return redirect()->action([self::class, 'index']);
        } else {
            $error = 'Usuário Não foi atualizado! Tente novamente';
            return view('unsuccess', compact('error'));
        }
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
}
