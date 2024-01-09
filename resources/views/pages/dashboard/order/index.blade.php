@extends('layouts.app')

@section('title', 'My Services')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My Services
                    </h2>
                    <p class="text-sm text-gray-400">
                        {{ $services->count() }} Total Services
                    </p>
                </div>
                <div class="col-span-4 lg:text-right">
                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                        <table class="w-full" aria-label="Table">
                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope="">Service Title</th>
                                    <th class="py-4" scope="">Service Describe</th>
                                    <th class="py-4" scope="">offer price</th>
                                    <th class="py-4" scope="">Status</th>
                                    <th class="py-4" scope="">Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($services as $service)
                                    <tr class="text-gray-700 border-b">
                                        <td class="w-2/6 px-1 py-5">
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded"
                                                        src="https://randomuser.me/api/portraits/men/3.jpg"
                                                        alt="User Profile" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true"></div>
                                                </div>

                                                <div>
                                                    <a href="{{ route('member.request.show', $service->id) }}"
                                                        class="font-medium text-black">
                                                        {{ $service->requestInfo->hizmet_title  }} 
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            {{ $service->requestInfo->hizmet_describe }}
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            {{ $service->offer_price }}
                                        </td>
                                        <td class="px-1 py-5 text-sm text-green-500 text-md">
                                            {{ $service->active }}
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            <form action="{{ route('accept.order', $service->id) }}" method="POST">
                                                @csrf
                                                @method('POST') <!-- Form methodunu POST olarak ayarlayın -->
                                                <button type="submit" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                                                    Accept
                                                </button>
                                            </form>

                                            <form action="{{ route('reject.order', $service->id) }}" method="POST">
                                                @csrf
                                                @method('POST') <!-- Form methodunu POST olarak ayarlayın -->
                                                <button type="submit" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                                                    Reject
                                                </button>
                                            </form>
                                        </td>


                                            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </section>
    </main>
@endsection
