<x-admin-layout>
<form action="{{route('admin.userStore')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="name">
            Nama
        </label>
        <input 
            class="w-full border border-gray-400 p-2 rounded" 
            type="text" 
            name="name" 
            id="name" 
            required
        >
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="email">
            Email
        </label>
        <input 
            class="w-full border border-gray-400 p-2 rounded" 
            type="email" 
            name="email" 
            id="email" 
            required
        >
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="password">
            Kata Sandi
        </label>
        <input 
            class="w-full border border-gray-400 p-2 rounded" 
            type="password" 
            name="password" 
            id="password" 
            required
        >
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="password_confirmation">
            Ulangi Kata Sandi
        </label>
        <input 
            class="w-full border border-gray-400 p-2 rounded" 
            type="password" 
            name="password_confirmation" 
            id="password_confirmation" 
            required
        >
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="address">
            Alamat
        </label>
        <textarea 
            class="w-full border border-gray-400 p-2 rounded" 
            name="address" 
            id="address" 
            required
        ></textarea>
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="gender">
            Jenis Kelamin
        </label>
        <select 
            class="w-full border border-gray-400 p-2 rounded" 
            name="gender" 
            id="gender" 
            required
        >
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
        </select>
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="photo">Foto
        </label>
        <input 
            class="w-full border border-gray-400 p-2 rounded" 
            type="file" 
            name="photo" 
            id="photo" 
            required
        >
    </div>
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-bold" for="roles">
            Peran
        </label>
        <select 
            class="w-full border border-gray-400 p-2 rounded" 
            name="roles" 
            id="roles" 
            required
        >
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-6">
        <button 
            class="bg-green-500 hover:bg-blue-700 text-green font-bold py-2 px-4 rounded" 
            type="submit"
        >
            Buat Pengguna
        </button>
    </div>
</form>

</x-admin-layout>