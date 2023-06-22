<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="w-full">
                <div class="flex">
                    <h1 class="text-[24px] font-semibold uppercase">{{$todo->title}}</h1>
                    @if($todo->isCompleted())
                        <span class="ml-3"> Completed on {{$todo->remaining_time}}</span>
                    @else
                        <span class="ml-3"> Due in {{$todo->remaining_time}}</span>
                    @endif
                </div>
            </div>
            <div class="relative overflow-x-auto mt-3 sm:rounded-lg">
                <p class="text-[14px] text-muted">{{$todo->description}}</p>
            </div>
        </div>
    </div>
</x-app-layout>
