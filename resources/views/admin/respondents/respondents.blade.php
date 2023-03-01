@extends('admin._partials.default')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Respondents</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Result List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="question-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Conclusion</th>
                        <th>Recommendation</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>User</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Conclusion</th>
                        <th>Recommendation</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($result as $data)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['question'] }}</td>
                            <td>{{ $data['answer'] }}</td>
                            <td>{{ $data['conclusion'] }}</td>
                            <td>{{ $data['recommendation'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#question-table').DataTable();
    });
</script>

@stop