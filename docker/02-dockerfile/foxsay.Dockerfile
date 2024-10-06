FROM ubuntu:latest

RUN apt update
RUN apt install -y cowsay

COPY ./src/fox.cow /usr/share/cowsay/cows/fox.cow

ENTRYPOINT [ "/usr/games/cowsay", "-f", "fox" ]

CMD [ "..." ]