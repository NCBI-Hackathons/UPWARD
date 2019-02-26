FROM mongo

COPY init.json /init.json
CMD mongoimport --host=127.0.0.1 --port 27017 --db porphyria --collection porphyria --type json --file /seed-data.json --jsonArray
