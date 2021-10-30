print("hola")
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.options import Options
import time
from faker import Faker
fake = Faker('es_ES')

time.sleep(1)
name = fake.name()
dni = fake.ean(length=8)
dob = fake.date(pattern='%d/%m/%Y')
dom = fake.name()
tel1 = fake.phone_number()
tel2 = fake.phone_number()
gen = fake.prefix()

driver.find_element_by_xpath('//*[@id="nombre"]').send_keys(name)
driver.find_element_by_xpath('//*[@id="dni"]').send_keys(dni)
driver.find_element_by_xpath('//*[@id="fecha_nacimiento"]').send_keys(dob)
driver.find_element_by_xpath('//*[@id="domicilio"]').send_keys(dom)
driver.find_element_by_xpath('//*[@id="telefono_principal"]').send_keys(tel1)
driver.find_element_by_xpath('//*[@id="telefono_emergencias"]').send_keys(tel2)
driver.find_element_by_xpath('//*[@id="genero"]').send_keys(gen)

driver.find_element_by_xpath('//*[@id="crear_paciente"]').click()