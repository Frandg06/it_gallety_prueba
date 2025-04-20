
@extends('layout')
@section('content')
    <div class="tabs__container">
        <x-tab-button :isActive="true">
            Summary
        </x-tab-button>
        <x-tab-button>
            General
        </x-tab-button>
        <x-tab-button>
            Images
        </x-tab-button>
        <x-tab-button>
            Actions
        </x-tab-button>
        <x-tab-button>
            Aditional info
        </x-tab-button>
        <x-tab-button>
            Documents
        </x-tab-button>
        <x-tab-button>
            Exhibitions
        </x-tab-button>
    </div>

    <article class="card">
        <figure class="item__image">
            <img id="image" src="" alt="">
        </figure>
        <div class="item__info">
            <div class="info">
                <h2 id="title"></h2>

                <div class="text__info">
                    <span class="series">From series: <span id="serie"></span></span>
                    <span class="author" id="artist"></span>
                    <span class="disponibility">
                        <span id="status_color" class="disponibility__icon"></span>
                        <span id="disponibility"></span> 
                    </span>
                    <span id="inventoryId"></span>
                    <span id="year"></span>
                    <span>5x25x13 cm · 1.9x9.8x5.1 in</span>
                    <span>800€ · 1,299 USD · 700€ with discount</span>
                </div>
            </div>
            <div class="action__buttons__container">
                <a class="edit__button" href="{{ route('edit', ['id' => request()->route('id')]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#000000" d="M3.995 17.207V19.5a.5.5 0 0 0 .5.5h2.298a.5.5 0 0 0 .353-.146l9.448-9.448l-3-3l-9.452 9.448a.5.5 0 0 0-.147.353m10.837-11.04l3 3l1.46-1.46a1 1 0 0 0 0-1.414l-1.585-1.586a1 1 0 0 0-1.414 0z"/></svg>
                </a>
                <button class="export__button">
                    Export to PDF
                </button>
                <button class="export__send__button">
                    Export & send PDF
                </button>
            </div>
        </div>
        <div class="next__prev__buttons">
            <a class="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#000000" d="m9.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675t-.15-.75t.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388t.375.875t-.375.875z"/></svg>
            </a>
            <a class="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#000000" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z"/></svg>
            </a>
        </div>
    </article>

    <div class="error"></div>
    <div class="loader">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="#000000" stroke-linecap="round" stroke-width="2"><path stroke-dasharray="60" stroke-dashoffset="60" stroke-opacity=".3" d="M12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="1.3s" values="60;0"/></path><path stroke-dasharray="15" stroke-dashoffset="15" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></g></svg>
    </div>


    <script>
        const id = @json(request()->route('id'));
        const url = @json(env('URL_REQUEST'));
        console.log(url)
        const card = document.querySelector('.card');
        const image = document.getElementById('image');
        const loader = document.querySelector('.loader');
        const serie = document.getElementById('serie');
        const artist = document.getElementById('artist');
        const disponibility = document.getElementById('disponibility');
        const inventoryId = document.getElementById('inventoryId');
        const year = document.getElementById('year');
        const errorDisplay = document.querySelector('.error');
        const disponibiblityIcon = document.getElementById('status_color');
        const nextButton = document.querySelector('.next');
        const prevButton = document.querySelector('.prev');
        
        
        const getData = async() => {
            try {
                const res = await fetch(`${url}/works/${id}`);
                const data = await res.json();
                return data;
            }catch(e){
    
            }
            
        }
        
        const putData = async() => {
            
            setLoading();

            const {data, error, next, prev} = await getData();
            
            
            if(error) return errorDisplay.innerHTML = error;
            
            (next) ? nextButton.href = next : nextButton.classList.add('disabled');
            (prev) ? prevButton.href = prev : prevButton.classList.add('disabled');
            title.innerHTML = data.title;
            serie.innerHTML = data.serieName;
            artist.innerHTML = data.artist.name;
            disponibility.innerHTML = data.status.name;
            inventoryId.innerHTML = data.inventoryId;
            year.innerHTML = data.year;
            image.src = data.img;
            switch (data.status.id) {
                case 1:
                    disponibiblityIcon.style.backgroundColor = "#17bc3f";
                    break;
                case 2:
                    disponibiblityIcon.style.backgroundColor = "red";
                    break;
                case 3:
                    disponibiblityIcon.style.backgroundColor = "#ffbd22";
                    break;
            
                default:
                    disponibiblityIcon.style.backgroundColor = "#17bc3f";
                    break;
            }
            finishLoading();
        }

        const setLoading = () => {
            card.style.display = "none";
            loader.style.display = "flex";
        }

        const finishLoading = () => {
            card.style.display = "flex";
            loader.style.display = "none";
        }

        putData();


    </script>
@stop