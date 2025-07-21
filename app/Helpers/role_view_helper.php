<?php
if (! function_exists('role_view')) {
    /**
     * Return path view sesuai folder role
     */
    function role_view(string $subpath, array $data = [])
    {
        $role = session()->get('role') ?? 'guest';
        return view($role . '/' . $subpath, $data);
    }
}
