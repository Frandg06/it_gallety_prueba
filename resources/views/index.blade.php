
@extends('layout')
@section('content')

  <div class="gallery__items__index"></div>

  <script>
    const container = document.querySelector('.gallery__items__index')

    const putData = async() => {
      const resp = await fetch("http://localhost:8000/api/works", {
        method: 'GET'
      });

      const {data} = await resp.json();
      data.forEach(item => {

        const link = document.createElement('a');
        link.href = `/${item.id}`;
        
        const img = document.createElement('img');
        img.src = item.img;


        link.appendChild(img);
        
        container.appendChild(link);
      });
    }

    putData();



  </script>
@stop
