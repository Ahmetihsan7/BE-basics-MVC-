<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PraktijkmanagementController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        return view('Praktijkmanagement.index', [
            'title' => 'Welkom praktijkmanagement'
        ]);
    }

    public function manageUserroles()
    {
        $users = $this->userModel->getAllUsers(Auth::id());

        return view('Praktijkmanagement.userroles', [
            'title' => 'Gebruikersrollen beheren',
            'users' => $users
        ]);
    }

    public function edit(string $id)
    {
        $user = $this->userModel->sp_GetUserById($id);

        $userroles = $this->userModel->sp_GetAllUserroles();

        return view('Praktijkmanagement.edit', [
            'title' => 'Wijzig de gebruikersrol',
            'user' => $user,
            'userroles' => $userroles
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:255'],
            'rolename' => ['required', 'string'],
        ]);

        $affected = $this->userModel->sp_UpdateUser(
            $id,
            $validated['name'],
            $validated['email'],
            $validated['rolename']
        );

        if ($affected === 0) {
            return back()->with('error', 'Er is niets gewijzigd of error bestaat niet');
        }

        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'User succesvol bijgewerkt');
    }
public function destroy(string $userId)
{
    $result = $this->userModel->sp_DeleteUser($userId);

    if ($result > 0) {
        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'User is succesvol verwijderd');
    }

    return redirect()->route('praktijkmanagement.userroles')
        ->with('error', 'User is niet verwijderd');
}

}