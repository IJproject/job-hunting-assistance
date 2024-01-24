FROM node:latest
WORKDIR /var/www
COPY package*.json /var/www
RUN npm install
RUN npm install @rollup/rollup-linux-arm64-gnu
CMD ["npm", "run", "dev"]