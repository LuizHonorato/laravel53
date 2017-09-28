<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;

class ProdutoController extends Controller
{
    private $totalPages = 3;
    private $produto;

    public function __construct(Produto $produto){
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de produtos';
        $produtos = $this->produto->paginate($this->totalPages);
        return view('painel.produtos.index', compact('produtos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Produto';
        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.produtos.create-edit', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->only(['nomeProduto', 'numeroProduto']));
        //dd($request->except(['_token', 'category']));
        //dd($request->input('nomeProduto'));

        $dataForm = $request->except('_token');

        $dataForm['ativo'] = (!isset($dataForm['ativo'])) ? 0 : 1;

        $this->validate($request, $this->produto->rules, $this->produto->messages);
        /*$validate = validator($dataForm, $this->produto->rules, $messages);


        if($validate->fails()){
            return redirect()
                   ->route('produtos.create')
                   ->withErrors($validate)
                   ->withInput();
        }*/

        $insert = $this->produto->create($dataForm);

        if($insert)
        return redirect()->route('produtos.index');
        else
        return redirect()->route('produtos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        $title = "Produto: {$produto->nomeProduto}";
        return view('painel.produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);

        $title = "Editar produto: {$produto->nomeProduto}";

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.produtos.create-edit', compact('title', 'categories', 'produto' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $produto = $this->produto->find($id);
        $dataForm['ativo'] = (!isset($dataForm['ativo'])) ? 0 : 1;
        $this->validate($request, $this->produto->rules, $this->produto->messages);
        $update = $produto->update($dataForm);
        if($update)
          return redirect()->route('produtos.index');
        else
          return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);
        $delete = $produto->delete();
        if($delete)
          return redirect()->route('produtos.index');
        else
          return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);

    }

    public function testes(){
        /*
        INSERÇÃO NA */
        $insert = $this->produto->create([
            'nomeProduto' => 'Notebook',
            'numeroProduto' => '005',
            'ativo' => true,
            'category' => 'eletronicos',
            'descricaoProduto' => 'Notebook Apple'
        ]);

        if ($insert) {
            return 'Inserido com sucesso.';
        }else{
            return 'Falha ao inserir o produto.';
        }


        /*
        UPDATE DE REGISTROS NA TABELA
        $prod = $this->produto->find(2);
        $update = $prod->update([
          'nomeProduto' => 'Notebook novo',
          'numeroProduto' => '0022',
          'ativo' => true,
          'category' => 'eletronicos',
          'descricaoProduto' => 'Novo Notebook Dell'
        ]);
        if ($update) {
            return 'Atualizado com sucesso.';
        }else{
            return 'Falha ao atualizar o produto.';
        }*/


        /*DELETE DE REGISTROS DO BANCO
        $prod = $this->produto->find(1);
        $delete = $prod->delete();
        if ($delete) {
            return 'Produto excluído com sucesso.';
        }else {
            return 'Falha ao excluir o produto.';
        }*/

    }
}
