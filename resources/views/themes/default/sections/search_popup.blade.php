<div class="search-popup js-search-popup">
    <div class="search-popup-bg"></div>
    <a href="javascript:;" class="close-button" id="search-close" aria-label="Close search">
        <svg>
            <use xlink:href="#i-close" />
        </svg>
    </a>
    <div class="popup-inner">
        <div class="inner-container">
            <form class="search-form" id="search-form" style="display: none">
                <div class="search-form-box flex">
                    <input type="text" class="search-input" placeholder="Type to search" id="search-input"
                        aria-label="Type to search" role="searchbox" autocomplete="off">
                </div>
            </form>
            <form class="search-form" id="search-form-official">
                <div class="search-form-box flex">
                    <input type="text" class="search-input" placeholder="Type to search" id="search-input-official"
                        aria-label="Type to search" role="searchbox" autocomplete="off">
                </div>
            </form>
            <div class="search-close-note">Press ESC to close.</div>
            <div class="search-result" id="search-results">
               
            </div>
            <div class="suggested-tags tag-wrap" id="suggested-tags">
                <h2 class="h6">Browse posts by popular tags</h2>
                <div class="tag-list">
                    @foreach($layoutData['tags'] as $tag)
                    <a href="{{ route('page.tag', [$tag->slug]) }}" style="--c-theme:{{ $tag->border_color }}">{{ $tag->name }}</a>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>