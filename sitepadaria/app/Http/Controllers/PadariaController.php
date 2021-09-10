<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class PadariaController extends Controller
{
    
    public function index() {
        
        

        $user = auth()->user();
         

        $search = request('search');

        if($search){
            $products = Product::where([
                ['product', 'like', '%'.$search.'%']
            ])->get();

        }   else{
            $products = Product::all();
        }

        return view('welcome', ['products'=>$products,'search'=>$search,'user'=>$user]);
    }


    public function pagecontato() {
        return view('pagecontato');
    }


    public function cadastro() {
             
        $user = auth()->user();
        if($user->Verificador == 3){
            return view('naopode');
        }   

            return view('cadastro',['user'=>$user]); 
    }


    public function cadastroprodutos() {
        
        $user = auth()->user();
        if($user->Verificador == 3){
            return view('naopode');
        }
        
        return view('cadastro.cadastroprodutos');

        $user = auth()->user();
        

    }
    
    public function store(Request $request){
        $product = new Product;

        $product->product = $request->product;
        $product->description = $request->description;
        $product->qtd = $request->qtd;
        $product->valor = $request->valor;
        $product->codigo = $request->codigo;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $product->image = $imageName;
        }

        $user = auth()->user();
        $product->user_id = $user->id;

        $product->save();

        return redirect('cadastro/cadastroprodutos')->with('msg','Produto cadastrado com sucesso!');
    }

    /*VISUALIZAR PRODUTO*/


    public function show($id) {

        $product= Product::FindOrFail($id);

        $user= auth()->user();
        $hasUserJoined = false;

        if($user){

            $userProducts = $user->productsAsParticipants->toArray();

            foreach($userProducts as $userProduct){
                if($userProduct['id']==$id){
                    $hasUserJoined=true;

                }
            }
        }


        return view('cadastro.show',['product'=>$product, 'hasUserJoined'=>$hasUserJoined]);
    }

    /* INFO DASHBOARD*/

    public function dashboard(){

        $user = auth()->user();

        $products = $user->products;

        $productsAsParticipants= $user->productsAsParticipants;

        return view('cadastro.dashboard',['products'=>$products, 'productsAsParticipants'=>$productsAsParticipants]);

    }

    /*DELETE */

    public function destroy($id){

        Product::findOrfail($id)->delete();

        return redirect('/dashboard')->with('msg','Produto excluido com sucesso!');

    }

    /*EDIT*/

    /*CLIENTES*/

    public function editcliente($id){

        $user = User::FindOrFail($id);

        return view('cliente.editcliente',['user'=>$user]);
    }

    public function updatecliente(Request $request){

        $data=$request->all();


        User::findOrfail($request->id)->update($data);

        return redirect('cliente/dashboardcliente')->with('msg','Cliente editado com sucesso!');

    }

    public function dashboardcliente(){

      $users = User::all();
        
      return view('cliente.dashboardcliente',['users'=>$users]);

    }

    public function destroycliente($id){

        User::findOrfail($id)->delete();

        return redirect('cliente/dashboardcliente')->with('msg','Cliente excluido com sucesso!');

    }


    /*PRODUTOS*/

    public function edit($id){

        $product = Product::FindOrFail($id);

        return view('cadastro.edit',['product'=>$product]);
    }

    public function update(Request $request){

        $data=$request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $data['image'] = $imageName;
        }


        Product::findOrfail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Produto editado com sucesso!');

    }

    /*ADICIONAR NO CARRINHO*/

    public function carrinho($id) {

        $user = auth()->user();

        $user->productsAsParticipants()->attach($id);

        $product = Product::findOrfail($id);

        return redirect('/dashboard')->with('msg', 'Seu produto foi adicionado com sucesso!');

    }


    /*DELETAR DO CARRINHO*/

    public function leavecarrinho($id){

        $user = auth()->user();

        $user->productsAsParticipants()->detach($id);

        $product = Product::findOrfail($id);

        return redirect('cadastro/carrinhocompras')->with('msg', 'Seu produto excluido!');


    }


    /*CARRINHO DE COMPRAS*/

    public function carrinhocompras() {

        $user = auth()->user();

        $products = $user->products;

        $productsAsParticipants= $user->productsAsParticipants;

        return view('cadastro.carrinhocompras',['products'=>$products, 'productsAsParticipants'=>$productsAsParticipants]);

}


    


}

