<nav class="bg-white-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('admins.index') }}">
                            <img width="40px" height="40px" src="https://img.icons8.com/dusk/64/000000/admin-settings-male.png"/>
                        </a>

                        <a href="{{ route('admins.users.showUsers') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Users</a>

                        <a href="{{ route('admins.owners.showOwners') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Owners</a>

                        <a href="{{ route('admins.showRoles') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Roles</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>