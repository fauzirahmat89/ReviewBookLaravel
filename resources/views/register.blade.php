@extends('layouts.master')

@section('judul')
REGISTER
@endsection

@section('content')
    <h2>Sign Up Form</h2>
    <form action="/register" method="post">
        @csrf
        <label>First name:</label><br><br>
        <input type="text" name="FirstName"><br><br>

        <label>Last name:</label><br><br>
        <input type="text" name="LastName"><br><br>

        <label>Gender:</label><br><br>
        <input type="radio" name="Gender" value="1"> Male <br>
        <input type="radio" name="Gender" value="2"> Female <br>
        <input type="radio" name="Gender" value="3"> Other <br><br>
    
        <label>Nationality:</label><br><br>
        <select name="Nationality">
            <option value="Indonesia">Indonesia</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Singapura">Singapura</option>
        </select><br><br>

        <label>Language Spoken:</label><br><br>
        <input type="checkbox" name="Language" value="Bahasa Indonesia"> Bahasa Indonesia <br>
        <input type="checkbox" name="Language" value="English"> English <br>
        <input type="checkbox" name="Language" value="Other"> Other <br><br>

        <label>Bio:</label><br><br>
        <textarea name="Bio" rows="15" cols="30"></textarea><br>

        <input type="submit">     
    </form>
@endsection