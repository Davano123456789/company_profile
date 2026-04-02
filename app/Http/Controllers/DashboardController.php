<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // ─── HOME ────────────────────────────────────────────────────────────────
    public function index()
    {

        return view('dashboard.index', [
            // menghitung jumlah data
            'totalClients' => Client::count(),
            'totalProjects' => Project::count(),
            'totalCategories' => ProjectCategory::count(),
        ]);
    }

    // ─── CLIENTS ─────────────────────────────────────────────────────────────
    public function clientsIndex()
    {
        // mengambil semua data dari tabel clients
        return view('dashboard.clients.index', ['clients' => Client::latest()->get()]);
    }

    public function clientsCreate()
    {
        // menampilkan halaman create
        return view('dashboard.clients.add');
    }

    public function clientsStore(Request $request)
    {
        // validasi
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);
        // menyimpan logo storage/app/public/clients
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }

        Client::create($data);

        return redirect()->route('dashboard.clients.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function clientsEdit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }

    public function clientsUpdate(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }
            // ganti dengan yang baru
            $data['logo'] = $request->file('logo')->store('clients', 'public');
        }

        $client->update($data);

        return redirect()->route('dashboard.clients.index')->with('success', 'Klien berhasil diperbarui.');
    }

    // menyimpan id client sesuai pilihan
    public function clientsDestroy(Client $client)
    {
        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }
        $client->delete();
        return redirect()->route('dashboard.clients.index')->with('success', 'Klien berhasil dihapus.');
    }

    // ─── PROJECTS ────────────────────────────────────────────────────────────
    public function projectsIndex()
    {
        return view('dashboard.projects.index', [
            'projects' => Project::with('category')->latest()->get(),
        ]);
    }

    public function projectsCreate()
    {
        return view('dashboard.projects.add', [
            // mengambil data kategori project
            'categories' => ProjectCategory::all(),
        ]);
    }

    public function projectsStore(Request $request)
    {
        // validasi inputan
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'project_category_id' => 'required|exists:project_categories,id',
            'image' => 'required|image|max:5120',
        ]);
        // menyimpan gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('dashboard.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function projectsEdit(Project $project)
    {
        return view('dashboard.projects.edit', [
            'project' => $project,
            'categories' => ProjectCategory::all(),
        ]);
    }

    public function projectsUpdate(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'project_category_id' => 'required|exists:project_categories,id',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('dashboard.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function projectsDestroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('dashboard.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }

    // ─── PROJECT CATEGORIES ───────────────────────────────────────────────────
    public function categoriesIndex()
    {
        return view('dashboard.category.index', [
            'categories' => ProjectCategory::latest()->get(),
        ]);
    }

    public function categoriesCreate()
    {
        return view('dashboard.category.add');
    }

    public function categoriesStore(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:project_categories,name']);
        ProjectCategory::create(['name' => $request->name]);
        return redirect()->route('dashboard.project-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function categoriesEdit(ProjectCategory $projectCategory)
    {
        return view('dashboard.category.edit', compact('projectCategory'));
    }

    public function categoriesUpdate(Request $request, ProjectCategory $projectCategory)
    {
        $request->validate(['name' => 'required|string|max:255|unique:project_categories,name,' . $projectCategory->id]);
        $projectCategory->update(['name' => $request->name]);
        return redirect()->route('dashboard.project-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function categoriesDestroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();
        return redirect()->route('dashboard.project-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
