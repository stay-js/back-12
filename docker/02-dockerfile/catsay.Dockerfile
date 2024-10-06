FROM ubuntu:latest

RUN apt update
RUN apt install -y cowsay

COPY ./src/cat.cow /usr/share/cowsay/cows/cat.cow

ENTRYPOINT [ "/usr/games/cowsay", "-f", "cat", "Miauu" ]