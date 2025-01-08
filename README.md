# Internet Speed Report
An open source tool to get a more in-depth look at your internet data.
It utilises [Speedtest CLI](https://github.com/sivel/speedtest-cli) and depicts your data in tables, graphs and charts.

This is a Laravel updated version to its predecessor [WebSpeedReport](https://github.com/bak-george/WebSpeedReport).

<img src="public/demo-img/demo-home-page.png">
<img src="public/demo-img/demo-data-show.png">

## Current Features
- Graph and table with each point directing to the corresponding data and.
- A show route for each data that dives deeper into the data.
- Button to execute the speedtest commands through the UI.
- API (GET requests and sorting)

## Currently working on
- API
- Setting a cron from the UI.

## How to Install
- Download the free version of [Herd](https://herd.laravel.com) and clone the repository within your Herd directory.
- Don't forget to run ```composer install``` once you cd inside your project and ```npm run dev``` to build the UI assets.

## How to Use
- Install [Speedtest CLI](https://github.com/sivel/speedtest-cli)
- cd into the project and run ```php artisan speedtest:run```.
- Click the "Run Speed Test" in the Homepage (see below)

## How to get all the features (App Setup)
### Pull regularly
I am working on this on a daily basis, so don't forget to ```git pull``` once in a while to get new stuff.

### "Run Speed Test" in the Homepage
#### Add the following into your php.ini
```
max_execution_time = 120
max_input_time = 60
default_socket_timeout = 6
```
In Herd on MacOS php.ini is located in the following path:
 ```
 /Users/your_username/Library/Application Support/Herd/config/php/the_php_version_you_use/php.ini
 ```
#### Restart Herd
```
herd restart
```
#### Add the speedtest path your .ENV and edit timeout
```
PHP_MAX_EXECUTION_TIME=120
SPEEDTEST_PATH=""
```
To find your own path of speedtest run the following:
```
which speedtest
```
### To see the Map data
Add your Free Mapbox API Key from [mapbox](https://www.mapbox.com/)
```
MAPBOX_API_KEY="Your mapbox API key"
```
## API
### Endpoint: Get All Speed Test Records

**URL**:
`http://internetspeedreport.test/api/v1/data/`

**Method**:
`GET`

---

### Example Request

```bash
curl http://internetspeedreport.test/api/v1/data/
```

```
{
  "data": [
    {
      "id": 11,
      "name": "Lorem ipsum dolor",
      "created_at": "2025-01-07T19:43:39.000000Z",
      "updated_at": "2025-01-07T19:43:39.000000Z",
      "download": 82.543216782934,
      "upload": 15.432189563872,
      "ping": 65.182,
      "server_url": null,
      "server_lat": "37.7749",
      "server_lon": "-122.4194",
      "server_name": "San Francisco",
      "server_country": "United States",
      "server_id": 10235,
      "server_latency": 65.182,
      "timestamp": "2025-01-07T19:43:14.000000Z",
      "bytes_sent": 12567893,
      "bytes_received": 78543289,
      "client_ip": "103.45.192.12",
      "client_lat": "36.7783",
      "client_lon": "-119.4179",
      "client_isp": "ISP Corp A",
      "client_country": "US"
    },
    {
      "id": 12,
      "name": "Ut enim ad minima",
      "created_at": "2025-01-07T19:50:15.000000Z",
      "updated_at": "2025-01-07T19:50:15.000000Z",
      "download": 92.317821234112,
      "upload": 12.561987329871,
      "ping": 50.874,
      "server_url": null,
      "server_lat": "51.5074",
      "server_lon": "-0.1278",
      "server_name": "London",
      "server_country": "United Kingdom",
      "server_id": 20876,
      "server_latency": 50.874,
      "timestamp": "2025-01-07T19:49:50.000000Z",
      "bytes_sent": 14567832,
      "bytes_received": 80234512,
      "client_ip": "192.0.2.34",
      "client_lat": "52.2053",
      "client_lon": "0.1218",
      "client_isp": "ISP Network B",
      "client_country": "GB"
    },
  ],
  "links": {
    "first": "http://internetspeedreport.test/api/v1/data?page=1",
    "last": "http://internetspeedreport.test/api/v1/data?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "links": [
      {
        "url": null,
        "label": "&laquo; Previous",
        "active": false
      },
      {
        "url": "http://internetspeedreport.test/api/v1/data?page=1",
        "label": "1",
        "active": true
      },
      {
        "url": null,
        "label": "Next &raquo;",
        "active": false
      }
    ],
    "path": "http://internetspeedreport.test/api/v1/data",
    "per_page": 15,
    "to": 2,
    "total": 2
  }
}

```
### Sorting
- Sort results using the `sort` query parameter.
- Use a field name  to sort in ascending order.
- Prefix a field with `-` (e.g., `-field_name`) to sort in descending order.
- Multiple fields can be sorted by separating them with commas (e.g., `sort=field1,-field2`).
- Sortable values = name, createdAt, ping, download, upload

### Example Request
```
http://internetspeedreport.test/api/v1/data?sort=name,-download
```

### Endpoint: Get Speed Test Data by ID
**URL**:
`http://internetspeedreport.test/api/v1/data/{id}`

**Method**:
`GET`

---

### Example Request

```bash
curl http://internetspeedreport.test/api/v1/data/12
```

### Example response

```
{
  "data": {
    "id": 101,
    "name": "Lorem Ipsum",
    "created_at": "2025-01-01T10:15:00.000000Z",
    "updated_at": "2025-01-01T10:15:00.000000Z",
    "download": 45.678,
    "upload": 12.345,
    "ping": 20.123,
    "server_url": null,
    "server_lat": "34.0522",
    "server_lon": "-118.2437",
    "server_name": "Los Angeles",
    "server_country": "United States",
    "server_id": 12345,
    "server_latency": 20.123,
    "timestamp": "2025-01-01T10:14:30.000000Z",
    "bytes_sent": 23456789,
    "bytes_received": 98765432,
    "client_ip": "192.0.2.1",
    "client_lat": "34.0522",
    "client_lon": "-118.2437",
    "client_isp": "ExampleISP",
    "client_country": "US"
  }
}
```
