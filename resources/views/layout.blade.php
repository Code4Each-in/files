<!DOCTYPE html>
<html lang="en">

@include('includes.css')

@stack('styles')

<body>
    <main id="main" class="main">
        <!-- <div class="pagetitle">
            
            <div class="row">
                <div class="col">
                    <h1>@yield('title')</h1>
                </div>
            </div>
        </div> -->
        <section class="section">
            <div class="row">
                @yield('content')
            </div>
        </section>
    </main>
<!-- for ecript tags -->
@include('includes.jss')
<!-- <script type="text/javascript">
    $(document).ready(function() {});
</script> -->
<!-- for js code -->
@yield('js_scripts')
</body>

</html>