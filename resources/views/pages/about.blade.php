@extends('layouts.app')

@section('content')
    <h1><?php echo $title; ?></h1>
    <table align="center">
        <tr align="center">
        <th colspan="4">Developers<th>
        </tr>
        <tr align="center">
            <th>Name</th>
            <th>PCN</th>
            <th>Repos</th>
            <th>LinkedIn<th>
        </tr>
        <tr align="center">
            <td>Mikael Ivanov</td>
            <td>378474</td>
            <td><a href="mikael.ivanov@student.fontys.nl">Email</a></th>
            <td><a href="https://www.linkedin.com/in/mikael-ivanov-7b1010179/">Miko</a><td>
        <tr>
        <tr align="center">
            <td>Mohammad Reza Baghban</td>
            <td>378474</td>
            <td><a href="https://github.com/MohammadRezaBaghban/">Github</a></th>
            <td><a href="https://www.linkedin.com/in/mohammad-reza-baghban-haghighi-0742a2102/">Mrbh</a><td>
        <tr>
    </table>
@endsection