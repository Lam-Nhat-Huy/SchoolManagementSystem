<!DOCTYPE html>
<html lang="en">

<head>
    @include('training_officer.dashboard.components.head')
</head>

<body>
    <div class="wrapper">
        @include('training_officer.dashboard.components.sidebar')


        <div class="main-panel">
            @include('training_officer.dashboard.components.navbar')

            <div class="container">
                @include($template)
            </div>

            @include('training_officer.dashboard.components.footer')

        </div>

        @include('training_officer.dashboard.components.custom')

    </div>


    @include('training_officer.dashboard.components.script')
</body>

</html>
