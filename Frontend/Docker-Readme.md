# Add file 'Dockerfile' into your app

# syntax=docker/dockerfile:1
FROM node:12-alpine
RUN apk add --no-cache python2 g++ make
WORKDIR
Learn more about the "WORKDIR" Dockerfile command.
 /app
COPY . .
RUN yarn install --production
CMD ["node", "src/index.js"]
EXPOSE 3000

# docker build -t getting-started .

# First port is Docker - Second port is Container
# docker run -dp 3000:3000 getting-started

# View all process status
# docker ps -a

# Stop or Remove Container
# docker stop <the-container-id>
# docker rm <the-container-id> / docker rm -f <the-container-id>

# Push on Docker Hub
# docker push docker/getting-started

# View list of images
# docker image ls

# Reference Tag
# docker tag CONTAINER-ID YOUR-USER-NAME/getting-started

# Push to Docker Hub
# docker push YOUR-USER-NAME/getting-started

# Run app on Docker Play
# https://labs.play-with-docker.com/