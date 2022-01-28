<script>
    var nextPage = '2';
    var totalPages = '3';
    var TweetQuoteText ='<svg><use xlink:href="#i-twitter"/></svg><span>Tweet this</span>';
</script>

<script src="{{ asset('assets/admin/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/theme/assets/js/app.bundle.mineef9.js?v=19c918e88e') }}"></script>
<script src="{{ asset('js/ckeditor/plugins/prism/lib/prism/prism_patched.min.js') }}"></script>
{{-- Add button copy to code snippet block --}}
<script>
    // get the list of all highlight code blocks
    const highlights = document.querySelectorAll("div.post-content pre")

    highlights.forEach((div, i) => {
    // create the copy button
    const copy = document.createElement("button");
    copy.dataset.copy_id = i;
    copy.innerHTML = `<i class="far fa-copy"></i> <span id="copyText${i}" class="copiedText" ><i class="fas fa-check"></i> Copied</span>`;
    copy.classList.add('btn-copy-snippet');
    // add the event listener to each click
    copy.addEventListener("click", handleCopyClick);
    // append the copy button to each code block
    div.append(copy);
    });

    const copyToClipboard = str => {
        const el = document.createElement("textarea") // Create a <textarea> element
        el.value = str // Set its value to the string that you want copied
        el.setAttribute("readonly", "") // Make it readonly to be tamper-proof
        el.style.position = "absolute"
        el.style.left = "-9999px" // Move outside the screen to make it invisible
        document.body.appendChild(el) // Append the <textarea> element to the HTML document
        const selected =
            document.getSelection().rangeCount > 0 // Check if there is any content selected previously
            ? document.getSelection().getRangeAt(0) // Store selection if found
            : false // Mark as false to know no selection existed before
        el.select() // Select the <textarea> content
        document.execCommand("copy") // Copy - only works as a result of a user action (e.g. click events)
        document.body.removeChild(el) // Remove the <textarea> element
        if (selected) {
            // If a selection existed before copying
            document.getSelection().removeAllRanges() // Unselect everything on the HTML document
            document.getSelection().addRange(selected) // Restore the original selection
        }
    }

function handleCopyClick(evt) {

  // get the children of the parent element
  const { children } = this.parentElement;
  // grab the first element (we append the copy button on afterwards, so the first will be the code element)
  // destructure the innerText from the code block
  const { innerText } = Array.from(children)[0];
  const copyId = this.dataset.copy_id;
  // copy all of the code to the clipboard
  copyToClipboard(innerText)
  // alert to show it worked, but you can put any kind of tooltip/popup to notify it worked
  $(`#copyText${copyId}`).show('fast');
  setTimeout(() => {
    $(`#copyText${copyId}`).hide('fast');
  }, 3000);
}
</script>
<style>
    .settings-panel {
        width: 240px;
        position: fixed;
        top: 200px;
        right: 0;
        background: var(--c-body-bg);
        border: 1px solid var(--c-border);
        border-radius: 6px;
        padding: 24px;
        z-index: 9999;
        box-shadow: var(--c-shadow);
        transition: right 0.25s;
    }

    .settings-panel.closed {
        right: -240px;
    }

    .settings-panel .icon {
        position: absolute;
        left: -38px;
        border: 1px solid var(--c-border);
        background: var(--c-body-bg);
        color: var(--c-text-main);
        padding: 8px;
        line-height: 0;
        border-radius: 6px 0 0 6px;
        box-shadow: var(--c-shadow);
        cursor: pointer;
    }

    .settings-panel .icon:hover {
        background-color: var(--c-theme);
        color: var(--c-white);
    }

    .settings-panel .icon svg {
        width: 20px;
        height: 20px;
        color: var(--c-primary-main);
    }

    .setting-section {
        padding: 8px 0;
        border-top: 1px solid var(--c-border-light);
        margin-top: 8px;
    }

    .setting-section-title {
        font-weight: 700;
        margin-bottom: 8px;
    }

    .color-collection {
        display: flex;
        flex-wrap: wrap;
    }

    .gbj-color-box {
        width: 30px;
        height: 30px;
        background-color: var(--custom-color);
        margin: 4px;
        border-radius: 4px;
        cursor: pointer;
        position: relative;
    }

    .gbj-color-box.active:before {
        content: "";
        width: 20px;
        height: 20px;
        background-color: #fff;
        opacity: .8;
        position: absolute;
        top: 5px;
        left: 5px;
        border-radius: 50%;
    }

    .color-output {
        display: inline-flex;
        margin-top: 24px;
    }

    #selected-color-box {
        width: 10px;
        height: 30px;
        background: var(--selected-color);
        border-radius: 4px;
    }

    .color-output .hash {
        width: 16px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-weight: 500;
    }

    .color-output #color-code {
        padding: 4px;
        border-radius: 4px;
        height: 30px;
        width: 70px;
        margin: 0;
    }

    .note {
        border-top: 1px solid var(--c-border-light);
        margin-top: 8px;
        padding-top: 8px;
    }

    div.highlight button {
        color: #adb5bd;
        box-sizing: border-box;
        transition: 0.2s ease-out;
        cursor: pointer;
        user-select: none;
        background: rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(0, 0, 0, 0);
        padding: 5px 10px;
        font-size: 0.8em;
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 0 0.15rem;
    }
</style>
<script>
    var body = document.body;
var settingToggle = document.getElementById('setting-panel-toggle');
settingToggle.addEventListener('click', function(e) {
document.getElementById('setting-panel').classList.toggle('closed');
})
/* nav-type */
const savedNavType = localStorage.getItem('nav-style');
if(savedNavType) {
document.getElementById(savedNavType).checked = true;
body.setAttribute('data-nav', savedNavType);
}
const navTypeOption = document.getElementsByName('nav_type');
for (let i = 0; i < navTypeOption.length; i++) {
navTypeOption[i].addEventListener('change', function() {
    const navType = this.value;
    body.setAttribute('data-nav', navType);
    localStorage.setItem('nav-style', navType);
    handleNav();
});
}
function initNav() {
CustomThrottle(handleNav(), 50);
}
function handleNav() {
var scroll = 1;
var navType = document.body.getAttribute('data-nav');
var header = document.querySelector('.site-header');
if(typeof(header) !== undefined && header !== null) {
    if ( navType === 'sticky') {
        window.addEventListener('scroll', CustomThrottle(function(){
            var currScroll = window.pageYOffset;
            if (currScroll > 1) {
                header.classList.add("small");
            } else {
                header.classList.remove("small");
            };
        }, 50));
    } else if (navType === 'sticky-hide') {
        window.addEventListener('scroll', CustomThrottle(function(){
            var currScroll = window.pageYOffset;
            if (currScroll > 1) {
                header.classList.add("small");
            } else {
                header.classList.remove("small");
            };
            if ( currScroll <= scroll) {
                header.classList.add("show");
                header.classList.remove("hide");
                scroll = currScroll;
            } else {
                header.classList.remove("show");
                header.classList.add("hide");
                scroll = currScroll;
            }
            if (currScroll == 0) {
                header.classList.remove("hide");
                header.classList.remove("show");
                header.classList.remove("sticky");
            }
        }, 50));
    } else {
        header.classList.remove("hide");
        header.classList.remove("show");
        header.classList.remove("sticky");
    }
}
}
function CustomThrottle(func, limit) {
var lastFunc, lastRan;
return function () {
    var context = this, args = arguments;
    if (!lastRan) {
        func.apply(context, args)
        lastRan = Date.now()
    } else {
        clearTimeout(lastFunc)
        lastFunc = setTimeout(function () {
            if ((Date.now() - lastRan) >= limit) {
                func.apply(context, args)
                lastRan = Date.now()
            }
        }, limit - (Date.now() - lastRan))
    }
}
}
/* color changing */
const root = document.querySelector(':root');
let colorsContainer = document.getElementById('color-collection');
const colors =['#0066FF', '#008280', '#D11F69', '#D63B2D', '#9E6D18', '#8A231A', '#BA4E0B', '#78510E', '#378705', '#6D62C1', '#6D62C1', '#A04DB1', '#AA5535', '#532F61', '#DB0A5B', '#D43900', '#D1329F', '#6441FC', '#3D10E0', '#E50B0B'];
const selectedColorBox = document.getElementById('selected-color-box');
const colorCodeBox = document.getElementById('color-code');
let accentColor = colors[0];
const savedColor = localStorage.getItem('accent-color');
if(savedColor !== null) {
accentColor = savedColor;
root.style.setProperty("--c-theme", accentColor);
}
selectedColorBox.setAttribute('style', `--selected-color:${accentColor}`);
colorCodeBox.value = accentColor.substring(1);

colors.forEach((color)=> {
let colorBox = document.createElement('div');
colorBox.setAttribute('class', 'gbj-color-box');
colorBox.setAttribute('data-color', color)
colorBox.setAttribute('style', `--custom-color:${color}`);
color === accentColor && colorBox.classList.add('active');
colorsContainer.appendChild(colorBox);
});

const allBoxes = document.querySelectorAll('.gbj-color-box')
allBoxes.forEach((box) => {
box.addEventListener('click', function(e) {
    document.querySelector(".gbj-color-box.active").classList.remove('active');
    const curr = e.target;
    curr.classList.add('active');
    const selectedColor = curr.getAttribute('data-color');
    selectedColorBox.setAttribute('style', `--selected-color:${selectedColor}`);
    colorCodeBox.value = selectedColor.substring(1);
    root.style.setProperty("--c-theme", selectedColor);
    localStorage.setItem('accent-color', selectedColor);
});
});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W6X0FLPR3C"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1246277708750778"
    crossorigin="anonymous"></script>
<script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W6X0FLPR3C');
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $('document').ready(function() {
        $('form[name=subscribe_news]').submit(function(e) {
            e.preventDefault();
            const name = $('#name').val();
            const email = $('#email').val();
            $.ajax({
                type: "POST",
                url: "{{ route('subscribe.news') }}",
                data: { name, email },
                beforeSend: function(res) {
                    $('#subscribe-btn').html('<i class="fa fa-cog fa-spin loading-icon"></i>');
                },
                success: function (response) {
                    $('form[name=subscribe_news]').hide();
                    $('.form-wrap').html(
                        `<div id="message-success-subscribe">
                            <i class="fas fa-check"></i>
                            <span>${response}</span>
                        </div>`
                    );
                },
                error: function(err) {
                    $('#subscribe-btn').html('<span>Error</span>');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#search-input-official').on('input', function() {
            const value = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('blogs.search') }}",
                data: { searchValue: value },
                success: function (response) {
                    $('#search-results').html('');
                   response.forEach((item) => {
                    $('#search-results').append(
                        `
                        <div class="search-result-item">
                            <a href="/${item.translation.slug}" class="search-result-item-box">
                            <div class="result-item-thumbnail">
                                    <img src="${item.thumbnailUrl}" alt="${item.translation.title}"/>
                            </div>
                            <div class="result-item-info">
                                    <h5 class="title">${item.translation.title}</h5>
                            </div>
                            </a>
                        </div>
                        `
                    );
                   })
                }
            });
        })
    });
</script>