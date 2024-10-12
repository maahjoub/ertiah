@if(auth('student')->check())
    <form method="GET" action="{{ route('logout',['student', '1']) }}">
        @elseif(auth('teacher')->check())
            <form method="GET" action="{{ route('logout','teacher') }}">
                @elseif(auth('parent')->check())
                    <form method="GET" action="{{ route('logout','parent') }}">
                        @else
                            <form method="GET" action="{{ route('logout','web') }}">
                                @endif

                                @csrf
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault();this.closest('form').submit();"><i
                                        class="bx bx-log-out"></i>{{  __('admin.logout') }}</a>
                            </form>
