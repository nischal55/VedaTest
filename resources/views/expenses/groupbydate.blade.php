@extends('layouts.app')

@section('content')
    <style>
        .red-background {
            background-color: red;
        }
    </style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Month</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">NoOfExpenses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                @php
                                  $month =  formatMonth($expense->month);
                                @endphp
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $month }}</td>
                                <td class='price' style="color: {{ $expense->total_price > 5000 ? 'red' : 'black' }};">
                                    Rs.{{ $expense->total_price }}
                                </td>
                                
                                <td>{{ $expense->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <script>
        // $(document).ready(function() {
        //     let colorValue = document.querySelector(".price");
        //     colorValue.classList.add("red-background");
        //     console.log('Document is ready');
        //     $('td.price').each(function() {
        //         var price = parseFloat($(this).text().trim());
        //         console.log('Price: ', price);
        //         if (price > 5000) {
        //             $(this).closest('tr').addClass('red-background');
        //         }
        //     });
        // });
    </script>
@endsection
