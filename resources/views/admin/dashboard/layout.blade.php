<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.dashboard.components.head')
</head>

<body>
    <div class="wrapper">
        @include('admin.dashboard.components.sidebar')


        <div class="main-panel">
            @include('admin.dashboard.components.navbar')

            <div class="container">
                @include($template)
            </div>

            @include('admin.dashboard.components.footer')

        </div>

        @include('admin.dashboard.components.custom')

    </div>


    @include('admin.dashboard.components.script')
</body>

</html>
