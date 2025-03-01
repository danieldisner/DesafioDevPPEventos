<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Filtro de tipo
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        // Filtro de nome
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filtro de endereço
        if ($request->has('address') && $request->address != '') {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        // Filtro de data (de)
        if ($request->has('start_date_from') && $request->start_date_from != '') {
            $query->where('start_time', '>=', $request->start_date_from);
        }

        // Filtro de data (até)
        if ($request->has('start_date_to') && $request->start_date_to != '') {
            $query->where('start_time', '<=', $request->start_date_to);
        }

        // Filtro de preço (de)
        if ($request->has('price_from') && $request->price_from != '') {
            $query->where('price', '>=', $request->price_from);
        }

        // Filtro de preço (até)
        if ($request->has('price_to') && $request->price_to != '') {
            $query->where('price', '<=', $request->price_to);
        }

        // Paginação dos eventos filtrados
        $events = $query->latest()->paginate(10);

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required|unique:events,name|max:255',
            'description' => 'nullable',
            'address' => 'required',
            'start_time' => 'required|date',
            'price' => 'nullable|numeric',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:events,name|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'address_link' => 'nullable|url',
            'start_time' => 'required|date',
            'price' => 'nullable|numeric',
            'type' => 'required|string',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento excluído com sucesso!');
    }
}
