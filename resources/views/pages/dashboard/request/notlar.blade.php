@extends('layouts.app')

@section('title', 'My Service')

@section('content')
  <main class="h-full overflow-y-auto">
    <div class="container mx-auto">
      <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
        <div class="col-span-8">
          <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
            My Services
          </h2>
          <p class="text-sm text-gray-400">
            3 Total Services
          </p>
        </div>
        <div class="col-span-4 lg:text-right">
          <div class="relative mt-0 md:mt-6">
            <a href="{{ route('member.request.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
              + Add Service
            </a>
          </div>
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
                  <th class="py-4" scope="">Service Details</th>
                  <th class="py-4" scope="">Role</th>
                  <th class="py-4" scope="">Price</th>
                  <th class="py-4" scope="">Status</th>
                  <th class="py-4" scope="">Action</th>
                </tr>
              </thead>

              <tbody class="bg-white">
                <tr class="text-gray-700 border-b">
                  <td class="w-2/6 px-1 py-5">
                    <div class="flex items-center text-sm">
                      <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded" src="https://randomuser.me/api/portraits/men/3.jpg" alt=""
                          loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>

                      <div>
                        <a href="/dashboard/services/details.php" class="font-medium text-black">
                          Design WordPress <br>E-Commerce Modules
                        </a>
                      </div>
                    </div>
                  </td>
                  <td class="px-1 py-5 text-sm">
                    Website Developer
                  </td>
                  <td class="px-1 py-5 text-sm">
                    Rp120.000
                  </td>
                  <td class="px-1 py-5 text-sm text-green-500 text-md">
                    Active
                  </td>
                  <td class="px-1 py-5 text-sm">
                    <a href="{{ route('member.service.edit', 1) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                      Edit Service
                    </a>
                  </td>
                </tr>

                <tr class="text-gray-700 border-b">
                  <td class="w-2/6 px-1 py-5">
                    <div class="flex items-center text-sm">
                      <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded" src="https://randomuser.me/api/portraits/men/7.jpg" alt=""
                          loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>

                      <div>
                        <a href="/dashboard/services/details.php" class="font-medium text-black">
                          Fix Any Issue on Your <br>
                          WordPress Website
                        </a>
                      </div>
                    </div>
                  </td>
                  <td class="px-1 py-5 text-sm">
                    Website Developer
                  </td>
                  <td class="px-1 py-5 text-sm">
                    Rp120.000
                  </td>
                  <td class="px-1 py-5 text-sm text-green-500 text-md">
                    Active
                  </td>
                  <td class="px-1 py-5 text-sm">
                    <a href="{{ route('member.service.edit', 1) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                      Edit Service
                    </a>
                  </td>
                </tr>

                <tr class="text-gray-700">
                  <td class="w-2/6 px-1 py-5">
                    <div class="flex items-center text-sm">
                      <div class="relative w-10 h-10 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded" src="https://randomuser.me/api/portraits/men/5.jpg" alt=""
                          loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>

                      <div>
                        <a href="/dashboard/services/details.php" class="font-medium text-black">
                          Create a UI Design <br>
                          for Your Application
                        </a>
                      </div>
                    </div>
                  </td>
                  <td class="px-1 py-5 text-sm">
                    Website Developer
                  </td>
                  <td class="px-1 py-5 text-sm">
                    Rp120.000
                  </td>
                  <td class="px-1 py-5 text-sm text-green-500 text-md">
                    Active
                  </td>
                  <td class="px-1 py-5 text-sm">
                    <a href="{{ route('member.service.edit', 1) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-email">
                      Edit Service
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </section>
  </main>
@endsection






<a href="{{ route('detail.landing', 1) }}" class="block">
  <div class="w-auto h-auto overflow-hidden md:p-5 p-4 bg-white rounded-2xl inline-block">
    <div class="flex items-center space-x-2 mb-6">
      <!--Author's profile photo-->
      <img class="w-14 h-14 object-cover object-center rounded-full mr-1" src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}"
        alt="random user" />
      <div>
        <!--Author name-->
        <p class="text-gray-900 font-semibold text-lg">Alex Jones</p>
        <p class="text-serv-text font-light text-md">
          Website Developer
        </p>
      </div>
    </div>

    <!--Banner image-->
    <img class="rounded-2xl w-full" src="{{ url('https://via.placeholder.com/750x500') }}" alt="placeholder" />

    <!--Title-->
    <h1 class="font-semibold text-gray-900 text-lg mt-1 leading-normal py-4">
      I Will Design WordPress eCommerce
      Modules
    </h1>
    <!--Description-->
    <div class="max-w-full">
      @include('components.landing.rating')
    </div>

    <div class="text-center mt-5 flex justify-between w-full">
      <span class="text-serv-text mr-3 inline-flex items-center leading-none text-md py-1 ">
        Price starts from:
      </span>
      <span class="text-serv-button inline-flex items-center leading-none text-md font-semibold">
        Rp 120.000
      </span>
    </div>
  </div>
</a>
