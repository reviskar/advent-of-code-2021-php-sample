# build phase
FROM php:8.0 AS build
COPY . /app
WORKDIR /app
RUN php composer.phar install

# run phase
FROM php:8.0

## copy artifacts from build phase
COPY --from=build /app /app

# setup input selection - this can be randomized in later stages
ENV INPUT_DAY01_01=./data/day01/input.txt

# copy solution runner
RUN chmod +x /app/run.sh

WORKDIR /app

ENTRYPOINT ["./run.sh"]
