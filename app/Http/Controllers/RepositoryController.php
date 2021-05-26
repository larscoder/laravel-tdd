<?php

namespace App\Http\Controllers;

use App\Http\Requests\RespositoryRequest;
use App\Models\Repository;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('repositories.index', [
            'repositories' => auth()->user()->repositories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repositories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RespositoryRequest $request)
    {
        $request->user()->repositories()->create($request->all());

        return redirect()->route('repositories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        $this->authorize('pass', $repository);

        return view('repositories.show', compact('repository'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        $this->authorize('pass', $repository);

        return view('repositories.edit', compact('repository'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(RespositoryRequest $request, Repository $repository)
    {
        $this->authorize('pass', $repository);

        $repository->update($request->all());

        return redirect()->route('repositories.edit', $repository);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repository  $repository
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
        $this->authorize('pass', $repository);

        $repository->delete();

        return redirect()->route('repositories.index');
    }
}
