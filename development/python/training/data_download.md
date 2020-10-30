---
layout: page
---

# Python data download

## environment

version 3.9.0

## Download sample

```python
import urllib.request


def print_title(title):
    print("==================================================================")
    print("= " + title)
    print("==================================================================")


def download_and_save_image():
    print_title('Download and Save Image')

    # image url
    url = "https://www.wikipedia.org/portal/wikipedia.org/assets/img/Wikipedia-logo-v2@2x.png"

    # Save image with original name
    urllib.request.urlretrieve(url)
    print("image saved")
    # Save image with new name
    urllib.request.urlretrieve(url, "image.png")
    print("image saved")

    # load image into the memory
    data = urllib.request.urlopen(url).read()
    with open("memory_image.png", mode="wb") as f:
        f.write(data)
    print("image saved")


def download_and_print_html():
    print_tite("Download and Print HTML")

    import urllib.parse

    url = "https://www.wikipedia.org/"

    response = urllib.request.urlopen(url)
    data = response.read()

    text = data.decode("utf-8")
    print(text)


def get_with_parameter():
    print_title("Get with Parameter")

    url = "https://en.wikipedia.org/"
    params = {
        'search': 'aaaaaaaaaa'
        # You can add more parameters
    }
    url += "?" + urllib.parse.urlencode(params)

    response = urllib.request.urlopen(url)
    data = response.read()

    text = data.decode("utf-8")
    print(text)


if __name__ == '__main__':
    print(
"""
Please input a number.
    1: Download and Save Image
    2: Download and Print HTML
    3: Get with Parameter
""")
    number = int(input())
    if number == 1:
        download_and_save_image()
    elif number == 2:
        download_and_print_html()
    elif number == 3:
        get_with_parameter()

```
