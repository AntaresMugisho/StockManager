<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleFormRequest;
use App\Models\Article;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.article.index", ["articles" => Article::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.article.form", [
            "article" => new Article()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleFormRequest $request)
    {   
        $article = Article::create($request->validated());
        $article->setCode();

        return redirect()->route("article.index")->with("success", "L'article a été créé avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view("dashboard.article.form", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        $article->update($request->validated());
        return redirect()->route("article.index")->with("success", "La mise à jour de l'article a réussi !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route("article.index")->with("success", "L'article a été définitivement supprimé");
    }
}
