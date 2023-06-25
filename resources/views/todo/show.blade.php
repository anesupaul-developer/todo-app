<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="w-full">
                <div class="flex">
                    <h1 class="text-[24px] font-semibold uppercase">{{$todo->title}}</h1>
                    @if($todo->isCompleted())
                        <span class="ml-3"> Completed on {{$todo->remaining_time}}</span>
                    @else
                        <span class="ml-3 text-red-600"> Due in {{$todo->remaining_time}}</span>
                    @endif
                </div>
            </div>
            <div class="relative overflow-x-auto mt-3 sm:rounded-lg">
                <p class="text-[14px] text-muted">{{$todo->description}}</p>
            </div>

            <div class="border-t-2 border-gray-300 mt-3 mb-3"></div>

            @if(!$todo->isCompleted())
                <div class="flex gap-x-3">
                    <a href="{{ route('todo.edit', [$todo->id]) }}" type="button"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <svg fill="#15803d" class="w-5 h-5 mr-2 fill-current" viewBox="0 0 32 32"
                             xmlns="http://www.w3.org/2000/svg" stroke="#15803d">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                               stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier"><title>pencil</title>
                                <path
                                    d="M0 32l12-4 20-20-8-8-20 20zM4 28l2.016-5.984 4 4zM8 20l12-12 4 4-12 12z"></path>
                            </g>
                        </svg>
                        Edit
                    </a>
                    <form method="POST" action="{{ route('todo.destroy', [$todo->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <svg class="w-5 h-5 mr-2 text-red-600 fill-current" viewBox="0 0 24 24"
                                 fill="#dc2626" xmlns="http://www.w3.org/2000/svg" stroke="#dc2626">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                   stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M10 11V17" stroke="#dc2626" stroke-width="1.2"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14 11V17" stroke="#dc2626" stroke-width="1.2"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4 7H20" stroke="#dc2626" stroke-width="1.2"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z"
                                        stroke="#dc2626" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                        stroke="#dc2626" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
