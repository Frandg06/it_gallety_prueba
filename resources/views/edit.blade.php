
@extends('layout')
@section('content')
    <form onsubmit="onSubmitForm(event)">
        <div class="form__buttons_container">
            <button type="submit" class="save__button">Save</button>
            <a class="cancel__button" href="{{ route('specificItem', ['id' => request()->route('id')]) }}">Cancel</a>
        </div>
        
        <article id="form_elements">
            <div class="form__element">
                <x-label for="language" :required="true">Language</x-label>
                <x-select name="language" :required="true">
                    @foreach (\App\Models\Language::all() as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="form__element">
                <x-label for="title" :required="true">Title</x-label>
                <x-input type="text" name="title"/>
            </div>
            <div class="form__element">
                <x-label for="serieName" >Serie name</x-label>
                <x-input type="text" name="serieName"/>
            </div>
            <div class="form__element">
                <x-label for="artist" :required="true">Artist</x-label>
                <x-select name="artist" :required="true">
                    @foreach (\App\Models\Artist::all() as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="form__element">
                <x-label for="year" >Year</x-label>
                <x-input type="number" name="year"/>
            </div>
            <div class="form__element">
                <x-label for="inventoryId" :required="true">Inventory ID</x-label>
                <x-input type="text" name="inventoryId"/>
            </div>
            <div class="form__element">
                <x-label for="status" :required="true">Status</x-label>
                <x-select name="status" :required="true">
                    @foreach (\App\Models\Status::all() as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="form__element">
                <x-label for="img" >Image</x-label>
                <x-input type="file" name="img"/>
            </div>
            <div class="form__element img">
                <x-label for="actualImg">Actual Image</x-label>
                <img id="actualImg" src=""/>
            </div>
            
        </article>
    </form>

    <div class="loader">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="#000000" stroke-linecap="round" stroke-width="2"><path stroke-dasharray="60" stroke-dashoffset="60" stroke-opacity=".3" d="M12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="1.3s" values="60;0"/></path><path stroke-dasharray="15" stroke-dashoffset="15" d="M12 3C16.9706 3 21 7.02944 21 12"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="15;0"/><animateTransform attributeName="transform" dur="1.5s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></g></svg>
    </div>


    <script>
        const id = @json(request()->route('id'));
        const url = @json(env('URL_REQUEST'));
        const card = document.getElementById('form_elements');
        const loader = document.querySelector('.loader');
        const img = document.getElementById('actualImg');
        const errorNotify = document.getElementById('error_notify');
        const successNotify = document.getElementById('success_notify');
        const inputs = document.querySelectorAll('input');
        const selects = document.querySelectorAll('select')

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

            const {data, error} = await getData();

            if(error) return;

            inputs.forEach(element => {
                if(element.name != 'img'){
                    element.value = data[element.name]
                }
                
            });

            selects.forEach(element => {
                element.value = data[element.name].id
            });

            img.src = data.img
            
            finishLoading();
        }

        const setLoading = () => {
            card.style.display = "none";
            loader.style.display = "flex";
        }

        const finishLoading = () => {
            card.style.display = "block";
            loader.style.display = "none";
        }

        putData();

        const onSubmitForm = async(event) => {
            event.preventDefault();
            const formData = new FormData(event.target);

            const resp = await fetch(`${url}/works/${id}`, {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'POST',
                body: formData
                });
            

            const data = await resp.json();

            if(data.error) {
                let errorMessage = "";
                data.error.forEach((error, index) => {
                    errorMessage += `${error}<br>`;
                });
                errorNotify.innerHTML = errorMessage;
                errorNotify.style.display = 'block';

                setTimeout(() => {
                    errorNotify.style.display = 'none';
                }, 4000);

            }else if(data.status){

                putData();

                successNotify.innerHTML = "Changes applied successfully";
                successNotify.style.display = 'block';
                setTimeout(() => {
                    successNotify.style.display = 'none';
                }, 4000);

            }
        }

    </script>
@stop