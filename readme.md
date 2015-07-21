## Laravel REST API hometask


### Создание новой миссии


```POST /api/v1/missions```

```Params: title```

### Создание списка целей миссии


```POST /api/v1/missions/{id}/targets```

```Params: type, status:['planned', 'executed', 'completed', 'canceled']```

### Выделение персонала для миссии;


Новый работник:

```POST /api/v1/missions/{id}/employees```

```Params: name, position```

Существующий работник

```PUT /api/v1/missions/{mid}/employees/{eid}```

### Управление целями миссии: запланировать новую цель, начать выполнение, закончить, отменить, если всезадачи выполнены, миссия также считается выполенной;


```PUT /api/v1/targets/{id}```

```Params: status:['planned', 'executed', 'completed', 'canceled']```

### Отмена мисии, при отмене мисии все незаконченые цели отменяются;

```PUT /api/v1/missions/{id}/cancel```

или

```PUT /api/v1/missions/{id}```

```with Param: status='canceled'```


### При завершении и отмене мисии, весь персонал освобождается.

```PUT /api/v1/missions/{id}```

```Param: status:['canceled','achieved']```

#### Также работают общие методы просмотра сущностей и коллекций

```GET /api/v1/missions```

```GET /api/v1/missions/{id}```

```GET /api/v1/missions/{id}/targets```

```GET /api/v1/missions/{mid}/targets/{tid}```

```GET /api/v1/missions/{id}/employees```

```GET /api/v1/missions/{mid}/employees/{eid}```

