@extends('layouts.app')

@section('title', 'Add Service')

@section('content')
  <main class="h-full overflow-y-auto">
    <div class="container mx-auto">
      <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
        <div class="col-span-12">
          <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
            Add Your reputation
          </h2>
          <p class="text-sm text-gray-400">
            Upload the services you provide
          </p>
        </div>
      </div>
    </div>

    <!-- ./breadcrumb -->
    <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
      <ol class="inline-flex p-0 list-none">
        <li class="flex items-center">
          <a href="{{ route('member.request.index') }}" class="text-gray-400">My reputation</a>
          <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path
              d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
          </svg>
        </li>
        <li class="flex items-center">
          <p class="font-medium">Add Your reputation</p>
        </li>
      </ol>
    </nav>
    <!-- ./end-breadcrumb -->

    <section class="container px-6 mx-auto mt-5">
      <div class="grid gap-5 md:grid-cols-12">
        <main class="col-span-12 p-4 md:pt-0">
          <div class="px-2 py-2 mt-2 bg-white rounded-xl">
            <!-- ./form -->
            <form action="{{ route('reputation.add') }}" method="POST">
             @csrf
              <div class="">
                <div class="px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                      <label for="reputation_title" class="block mb-3 font-medium text-gray-700 text-md">reputation başlığı</label>
                      <input placeholder="" type="text" name="reputation_title" id="reputation_title"
                        autocomplete="reputation_title"
                        class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div class="col-span-6">
                      <label for="target_username" class="block mb-3 font-medium text-gray-700 text-md">Github username</label>
                      <input placeholder="" type="text" name="target_username" id="target_username"
                        autocomplete="target_username"
                        class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>

                    <div class="col-span-6">
                      <label for="delivery_date" class="block mb-3 font-medium text-gray-700 text-md">teslim tarihi(gün.ay.yıl)</label>
                      <input placeholder="" type="text" name="delivery_date" id="delivery_date"
                        autocomplete="delivery_date"
                        class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div class="col-span-6">
                      <label for="reputation_price" class="block mb-3 font-medium text-gray-700 text-md">Max bütçe</label>
                      <input placeholder="" type="number" name="reputation_price" id="reputation_price" autocomplete="reputation_price"
                        class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                <div class="px-4 py-3 text-right sm:px-6">
                  <button type="submit"
                    class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">
                    Cancel
                  </button>

                  <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Create Service
                  </button>
                </div>
              </div>
            </form>
            <!-- ./end-form -->
          </div>
        </main>
      </div>
    </section>
  </main>
@endsection

@push('after-script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endpush
