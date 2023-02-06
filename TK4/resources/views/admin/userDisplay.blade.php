<x-admin-layout>
<div class="bg-gray-200 h-screen p-4">
    <h1 class="text-4xl font-bold mb-4">User Management</h1>
    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('admin.userCreate') }}"> Create User</a>
    <table class="table-auto w-full">
      <thead>
        <tr>
        <th class="px-4 py-2">No</th>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Role</th>
          <th colspan=2 class="px-4 py-2">Action</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td class="border px-4 py-2">{{++$i}}</td>
          <td class="border px-4 py-2">{{ $user->name }}</td>
          <td class="border px-4 py-2">{{ $user->email }}</td>
          <td class="border px-4 py-2">{{ $user->roles[0]['name'] }}</td>
          <td class="border px-4 py-2 content-center">
          <a href="{{ route('admin.userEdit', $user->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('admin.userDelete',$user->id) }}" method="POST" onsubmit="return confirm('{{ trans('are You Sure ? ') }}');">
                                    
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-admin-layout>