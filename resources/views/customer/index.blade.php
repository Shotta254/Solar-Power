<x-app-layout>
  <div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded shadow">
      <h1 class="text-xl font-bold mb-4">Customers</h1>

      @if(session('success'))
          <div class="mb-4 text-green-600 font-semibold">
              {{ session('success') }}
          </div>
      @endif

      <a href="{{ route('customers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Customer</a>

      <table class="w-full border">
          <thead>
              <tr class="bg-gray-100">
                  <th class="p-2 border">Name</th>
                  <th class="p-2 border">Address</th>
                  <th class="p-2 border">Mobile</th>
                  <th class="p-2 border">Telephone</th>
                  <th class="p-2 border">Email</th>
                  <th class="p-2 border">Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach($customers as $customer)
                  <tr>
                      <td class="p-2 border">{{ $customer->name }}</td>
                      <td class="p-2 border">{{ $customer->address }}</td>
                      <td class="p-2 border">{{ $customer->mobile }}</td>
                      <td class="p-2 border">{{ $customer->telephone }}</td>
                      <td class="p-2 border">{{ $customer->email }}</td>
                      <td class="p-2 border">
                          <a href="{{ route('customers.edit', $customer) }}" class="text-blue-600">Edit</a>
                          
                          <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-red-600 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</x-app-layout>
