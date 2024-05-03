<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoStoreRequest;
use App\Http\Requests\PhotoUpdateRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // Добавление фотографии
    public function store(PhotoStoreRequest $request)
    {
        if ($request->hasFile('photos')) {
            $uploadedPhotos = [];

            foreach ($request->file('photos') as $photo) {
                $originalName = $photo->getClientOriginalName();

                $pathWithPrefix = 'photos/' . $originalName;
                $path = $photo->storeAs('public/photos', $originalName);

                $uploadedPhoto = new Photo();
                $uploadedPhoto->path = $pathWithPrefix;
                $uploadedPhoto->save();

                $uploadedPhotos[] = [
                    'message' => 'Success',
                    'local_url' => Storage::url('app/' . $path),
                    'global_url' => '/public/storage/' . $pathWithPrefix
                ];
            }

            return response()->json($uploadedPhotos);
        }

        return response()->json(['message' => 'No photos to upload'], 400);
    }

    // Просмотр всех фотографий
    public function index() {
        $photos = Photo::all();
        return response()->json($photos)->setStatusCode(200, 'Успешно');
    }

    // Просмотр фотографии
    public function show($id) {
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json('Фотография не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json($photo)->setStatusCode(200, 'Успешно');
    }

    // Редактирование фотографии
    public function update(PhotoUpdateRequest $request, $id)
    {
        // Находим фотографию по идентификатору
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json('Фотография не найдена')->setStatusCode(404, 'Not found');
        }

        // Получаем новый путь к фотографии из запроса
        $newPath = $request->input('path');

        // Извлекаем имя файла из нового пути
        $newFileName = pathinfo($newPath, PATHINFO_BASENAME);

        // Получаем текущий путь к фотографии
        $currentPath = $photo->path;

        // Обновляем имя файла в хранилище
        if ($newPath && $newFileName && $currentPath !== $newPath) {
            // Удаляем старый файл из хранилища, только если путь изменился
            Storage::move($currentPath, 'public/photos' . $newFileName);

            // Обновляем путь к фотографии в базе данных
            $photo->path = 'photos/' . $newFileName;
            $photo->save();

            return response()->json('Путь фотографии успешно изменён')->setStatusCode(200, 'Успешно');
        }

        return response()->json('Путь для обновления не указан или фотография уже имеет указанный путь')->setStatusCode(400, 'Ошибка');
    }

    // Удаление фотографии
    public function destroy($id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json('Фотография не найдена')->setStatusCode(404, 'Not found');
        }

        Storage::delete('public/' . $photo->path);

        $photo->delete();

        return response()->json('Фотография удалена')->setStatusCode(200, 'Удалено');
    }
}
