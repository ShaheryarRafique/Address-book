<table class="min-w-full bg-white text-center border-b-slate-300 table-auto">
    <thead>
        <tr>
            <th class="py-3 px-4  font-bold uppercase bg-gray-100 text-sm text-gray-600">Name</th>
            <th class="py-3 px-4  font-bold uppercase bg-gray-100 text-sm text-gray-600">Email</th>
            <th class="py-3 px-4  font-bold uppercase bg-gray-100 text-sm text-gray-600">Contact</th>
            <th class="py-3 px-4  font-bold uppercase bg-gray-100 text-sm text-gray-600">Role</th>
            <th class="py-3 px-4  font-bold uppercase bg-gray-100 text-sm text-gray-600">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td class="py-3 px-4 border-b">{{ $contact->name }}</td>
                <td class="py-3 px-4 border-b">{{ $contact->email }}</td>
                <td class="py-3 px-4 border-b">{{ $contact->contact }}</td>
                <td class="py-3 px-4 border-b">{{ $contact->role }}</td>
                <td class="py-3 px-4 border-b text-purple-600">
                    <div class="flex justify-around items-center">
                        <a href="/delete-contact/{{ $contact->contact_id }}" >
                            <div class="w-6 text-center"><x-eos-delete /></div>
                        </a>
    
                        <a href="/update-contact/{{ $contact->contact_id }}" >
                            <div class="w-6 text-center"><x-bi-pencil-fill /></div>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
