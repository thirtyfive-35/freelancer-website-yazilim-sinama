
@extends('layouts.front')

@section('title', 'Explore')

@section('content')

<div class="content">
    <!-- services -->
    <div class="bg-serv-bg-explore overflow-hidden">
      <div class="pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 mx-auto">
        <div class="text-center">
          <h1 class="text-3xl font-semibold mb-1">Reputations Overviews</h1>
          <p class="leading-8 text-serv-text mb-10">
            Discover the world's top Freelancers
          </p>
        </div>

        <div class="grid grid-cols lg:grid-cols-3 md:grid-cols-2 gap-4">

@foreach($reputations as $service)
    <a href="{{ route('reputations.get', $service->id) }}" class="block">
        <div class="w-auto h-auto overflow-hidden md:p-5 p-4 bg-white rounded-2xl inline-block">
            <div class="flex items-center space-x-2 mb-6">
                <!--Author's profile photo-->
                <img class="w-14 h-14 object-cover object-center rounded-full mr-1" src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="random user" />
                <div>
                    <!--Author name-->
                    <p class="text-gray-900 font-semibold text-lg">{{ $service->user->name }}</p>
                    <p class="text-serv-text font-light text-md">
                        Website Developer
                    </p>
                </div>
            </div>

            <!--Banner image-->
            <img class="rounded-2xl w-full" src="{{ url('https://via.placeholder.com/750x500') }}" alt="placeholder" />

            <!--Title-->
            <h1 class="font-semibold text-gray-900 text-lg mt-1 leading-normal py-4">
                {{ $service->reputation_title }}
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
                    to get 2 usd
                </span>
            </div>
        </div>
    </a>
@endforeach

</div>
        <div class="text-center mt-10">
          <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
            Load More
          </a>
        </div>
      </div>
    </div>

  </div>
@endsection