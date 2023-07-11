<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=purple&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Contact to Address-Book</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-4" action="/update-contact/{{ $contact[0]->contact_id }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value={{$contact[0]->name}} required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-outset focus:ring-black-400 sm:text-sm sm:leading-6 p-3">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    </div>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value={{$contact[0]->email}} required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black-400 sm:text-sm sm:leading-6 p-3">
                    </div>

                </div>

                <div>
                    <label for="contact" class="block text-sm font-medium leading-6 text-gray-900">Contact</label>
                    <div class="mt-2">
                        <input id="contact" name="contact" type="text" value={{$contact[0]->contact}} required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-outset focus:ring-black-400 sm:text-sm sm:leading-6 p-3">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium leading-6 text-gray-900">Role</label>
                    <div class="mt-2 space-y-2 space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-purple-600" name="role" value="user" {{$contact[0]->role == 'user' ? 'checked' : ''}}>
                            <span class="ml-2 text-gray-900">User</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio h-4 w-4 text-purple-600" name="role" value="admin"
                            {{$contact[0]->role == 'admin' ? 'checked' : ''}} >
                            <span class="ml-2 text-gray-900">Admin</span>
                        </label>
                    </div>
                </div>                

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-purple-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
