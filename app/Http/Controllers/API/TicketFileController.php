<?php

namespace App\Http\Controllers\API;

use App\Models\Ticket;
use App\Models\TicketFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TicketFileController extends Controller
{
    public function index()
    {
        $ticketFiles = TicketFile::with('ticket')->paginate(5);

        return response()->json([
            'data' => $ticketFiles->items(),
            'meta' => [
                'total' => $ticketFiles->total(),
                'per_page' => $ticketFiles->perPage(),
                'current_page' => $ticketFiles->currentPage(),
                'last_page' => $ticketFiles->lastPage(),
                'next_page_url' => $ticketFiles->nextPageUrl(),
                'prev_page_url' => $ticketFiles->previousPageUrl(),
            ],
            'message' => 'Ticket files retrieved successfully',
            'success' => true,
        ]);
    }

    public function show(TicketFile $ticketFile)
    {
        return response()->json([
                'data' => $ticketFile,
                'message' => 'Ticket file retrieved successfully',
                'success' => true,
        ]);
    }

    public function store(Request $request, Ticket $ticket)
    {

        $request->validate([
            'file' => 'required|file|mimes:doc,docx,pdf,xlsx,csv,jpeg,png,jpg|max:2048'
        ]);

        $fileName =
         $ticket->id . '_' . uniqid() . '.' . $request->file('file')
        ->getClientOriginalExtension();

        // Store the file with the generated name
        $url = $request->file('file')
                       ->storeAs(
                                'files', $fileName,
                             'public'
                            );



        $ticket->files()
               ->create([
                 'url' => $url,
                ]);

        return response()->json([
            'data' => [
                'url' => $url
            ],
            'message' => 'File saved successfully',
            'success' => true,
        ]);
    }

   public function showAllTicketFiles(Ticket $ticket)
   {
        return response()->json([
            'data' => $ticket->files,
            'message' => 'Ticket files retrieved successfully',
            'success' => true,
        ]);
   }

    public function destroy(TicketFile $ticketFile)
    {
        if (Storage::disk('public')->exists($ticketFile->url)) {
            Storage::disk('public')->delete($ticketFile->url);
        }

        $ticketFile->delete();

        return response()->json([
            'message' => 'File deleted successfully',
            'success' => true,
        ]);
    }

}


