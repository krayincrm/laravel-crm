@unless ($breadcrumbs->isEmpty())
    <nav aria-label="">
        <ol class="flex flex-wrap">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (
                    $breadcrumb->url 
                    && ! $loop->last
                )
                    <li class="flex items-center gap-x-1 text-sm font-normal text-brandColor dark:text-brandColor">
                        <a 
                            href="{{ $breadcrumb->url }}"
                            class="text-xs transition-all duration-300 sm:text-base md:text-base lg:text-base"
                        >
                            {{ $breadcrumb->title }}
                        </a>

                        <span class="after:content-['/'] ltr:mr-1 rtl:ml-1"></span>
                    </li>
                @else
                    <li 
                        class="flex items-center gap-x-1 text-xs text-gray-600 transition-all duration-300 after:content-['/'] last:cursor-default after:last:hidden dark:text-gray-300 sm:text-base md:text-base lg:text-base" 
                        aria-current="page"
                    >
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
