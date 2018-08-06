<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipes;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all data from recipes
     */    public function index(Request $request)
    {
        $recipes = new Recipes;
        $res['success'] = true;
        $res['result'] = $recipes->all();
        return response($res);
    }

    /**
     * Insert database for recipes
     * Url : /recipes/create
     */    public function create(Request $request)
    {
        $this->validate($request, [
            'recipe_code' => 'required',
            'recipe_name' => 'required',
            'recipe_description' => 'required',
            'recipe_author' => 'required',
        ]);

        $recipes = Recipes::create([
            'recipe_code' => $request->input('recipe_code'),
            'recipe_name' => $request->input('recipe_name'),
            'recipe_description' => $request->input('recipe_description'),
            'recipe_author' => $request->input('recipe_author'),
        ]);

        $res['success'] = true;
        $res['message'] = 'Success create recipe';
        $res['data'] = $recipes;
        return response($res);
    }
    /**
     * Get one data recipes by id
     * Url : /recipes/{id}
     */    public function read(Request $request, $id)
    {
        $recipes = Recipes::where('id', $id)->first();

        if ($recipes === null) {
            $res['success'] = false;
            $res['result'] = 'Recipe not found!';
            return response($res);
        } else {
            $res['success'] = true;
            $res['result'] = $recipes;
            return response($res);
        }
    }
    /**
     * Update data recipes by id
     */    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'recipe_code' => 'required',
            'recipe_name' => 'required',
            'recipe_description' => 'required',
            'recipe_author' => 'required',
        ]);

        $recipes = Recipes::where('id', $id)->update([
            'recipe_code' => $request->input('recipe_code'),
            'recipe_name' => $request->input('recipe_name'),
            'recipe_description' => $request->input('recipe_description'),
            'recipe_author' => $request->input('recipe_author'),
        ]);

        if ($recipes == 0) {
            $res['success'] = false;
            $res['result'] = 'No product updated';
            return response($res);
        } else {
            $res['success'] = true;
            $res['result'] = 'Success update id '.$id;
            return response($res);
        }
    }
    /**
     * Delete data recipes by id
     */    public function delete(Request $request, $id)
    {
        $recipes = Recipes::find($id);
        if ($recipes === null) {
            $res['success'] = false;
            $res['result'] = 'Recipe not found!';
            return response($res);
        } else {
            if ($recipes->delete($id)) {
                $res['success'] = true;
                $res['result'] = 'Success delete recipe!';
                return response($res);
            }
        }
    }
}