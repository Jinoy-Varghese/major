npm init -y
npm i express ejs socket.io
npm i uuid
npm i --save-dev nodemon
npm i -g peer

To start server :
	npm run devStart

To ensure peer-to-peer connection, run following command in another terminal :
	peerjs --port 3001

To view output :
	search localhost:3000 in browser